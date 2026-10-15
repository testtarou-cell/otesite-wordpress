(() => {
  'use strict';
  const data = oteEditor.data;
  const root = document.getElementById('ote-editor');
  const labels = {label:'分類ラベル',text:'お知らせ本文',url:'リンク（空欄ならリンクなし）',published:'公開する',question:'質問',answer:'回答',name:'名称',amount:'金額（要相談なども入力可）',unit:'単位',day:'日',weekday:'曜日（月〜日）',note:'補足',time:'時間',month:'月',year:'年（未確認なら空欄）',schedule_image:'月間表の画像',schedule_alt:'月間表の説明',kids:'キッズ・ジュニアの写真',general:'一般クラスの写真',family:'キッズ親子クラスの写真'};
  const el = (tag,text) => { const n=document.createElement(tag); if(text!==undefined)n.textContent=text; return n; };
  const button = (text,fn) => {const b=el('button',text);b.type='button';b.className='button';b.addEventListener('click',fn);return b;};
  function field(parent,obj,key,image=false) {
    const label=el('label',labels[key] || key); label.style.cssText='display:block;margin:10px 0';
    const input=el(['text','answer','note'].includes(key)?'textarea':'input');
    if (key==='published') {input.type='checkbox';input.checked=!!obj[key];}
    else {input.value=obj[key]??'';input.style.cssText='display:block;width:100%;max-width:760px'; if(input.tagName==='TEXTAREA')input.rows=3;}
    input.addEventListener('input',()=>{obj[key]=key==='published'?input.checked:input.value;});
    label.append(input);parent.append(label);
    if(image){
      const preview=el('img');preview.src=obj[key]||'';preview.hidden=!obj[key];preview.style.cssText='max-width:200px;max-height:160px;display:block;margin:8px 0';parent.append(preview);
      const update=url=>{obj[key]=url;input.value=url;preview.src=url;preview.hidden=!url;};
      input.addEventListener('input',()=>update(input.value));
      parent.append(button('画像を選択',()=>{const frame=wp.media({title:'画像を選択',library:{type:'image'},multiple:false});frame.on('select',()=>update(frame.state().get('selection').first().toJSON().url));frame.open();}),button('初期画像に戻す',()=>update('')));
    }
  }
  function list(parent,array,blank,fields,nested=false) {
    const wrap=el('div');parent.append(wrap);
    function render(){wrap.replaceChildren();array.forEach((record,i)=>{
      const box=el('fieldset');box.style.cssText='border:1px solid #ccd0d4;padding:12px;margin:12px 0;background:#fff';
      box.append(el('legend',`${i+1}件目`));fields.forEach(k=>field(box,record,k));
      if(nested){box.append(el('h4','この日のレッスン'));list(box,record.events,{time:'',name:'',note:''},['time','name','note']);}
      box.append(button('削除',()=>{if(window.confirm('この項目を削除しますか？（保存するまでは確定しません）')){array.splice(i,1);render();}}));
      if(i>0)box.append(button('上へ',()=>{[array[i-1],array[i]]=[array[i],array[i-1]];render();}));
      if(i<array.length-1)box.append(button('下へ',()=>{[array[i+1],array[i]]=[array[i],array[i+1]];render();}));
      wrap.append(box);
    });wrap.append(button('項目を追加',()=>{array.push(JSON.parse(JSON.stringify(blank)));render();}));}
    render();
  }
  function section(title,fn){const s=el('details');s.style.cssText='margin:16px 0;padding:16px;border:1px solid #ccd0d4;background:#f6f7f7';const h=el('summary',title);h.style.cssText='font-size:18px;cursor:pointer';s.append(h);fn(s);root.append(s);}
  function download(text,name){const url=URL.createObjectURL(new Blob([text],{type:'text/csv;charset=utf-8'}));const a=el('a');a.href=url;a.download=name;a.click();setTimeout(()=>URL.revokeObjectURL(url),1000);}
  function csvControls(parent,kind){
    const box=el('div');box.style.cssText='padding:12px;background:#fff;border:1px solid #ccd0d4;margin:12px 0';
    box.append(el('h3',kind==='schedule'?'スケジュールCSV':'料金CSV'));
    box.append(el('p',kind==='schedule'?'列：年,月,日,曜日,時間,名称,補足,日付補足。同じ日のレッスンは複数行にできます。画像は変更されません。':'列：区分,名称,金額,単位。区分：入会・登録料／一般／ジュニア／親子／その他。CSVにない区分は保持します。'));
    const input=el('input');input.type='file';input.accept='.csv,text/csv';input.setAttribute('aria-label',kind==='schedule'?'スケジュールCSVファイル':'料金CSVファイル');box.append(input);
    const select=el('select');select.setAttribute('aria-label','取り込み方法');[['replace','置き換え'],['append','追加']].forEach(([v,t])=>{const o=el('option',t);o.value=v;select.append(o);});box.append(select);
    const status=el('p');status.setAttribute('role','status');box.append(status);
    let parsed=null;
    const apply=button('確認したCSVを編集欄に反映',()=>{
      if(!parsed)return;
      if(kind==='schedule'){
        if(select.value==='append'){
          if(data.year!==parsed.year||String(+data.month)!==parsed.month){status.textContent='追加する場合は、現在の年・月とCSVの年・月を合わせてください。';return;}
          if(parsed.days.some(d=>data.days.some(old=>+old.day===+d.day))){status.textContent='追加する日付が既存の日付と重複しています。置き換えを選ぶかCSVを修正してください。';return;}
          data.days.push(...parsed.days);data.days.sort((a,b)=>+a.day-+b.day);
        }else{data.year=parsed.year;data.month=parsed.month;data.days=parsed.days;}
      }else Object.entries(parsed).forEach(([g,rows])=>{data[g]=select.value==='append'?[...data[g],...rows]:rows;});
      dirty=true;renderEditor();
      const message=el('p','CSVを編集欄に反映しました。内容を確認し、ページ下部の「変更を保存」で確定してください。');message.setAttribute('role','status');root.prepend(message);
    });apply.disabled=true;box.append(apply);
    input.addEventListener('change',async()=>{
      parsed=null;apply.disabled=true;const file=input.files[0];if(!file)return;
      try{
        if(file.size>2*1024*1024)throw Error('CSVは2MB以内にしてください。');
        const buffer=await file.arrayBuffer();let text;
        try{text=new TextDecoder('utf-8',{fatal:true}).decode(buffer);}catch{text=new TextDecoder('shift_jis',{fatal:true}).decode(buffer);}
        parsed=kind==='schedule'?oteCSV.schedule(text):oteCSV.fees(text);
        status.textContent=kind==='schedule'?`${parsed.year||'年未確認'} / ${parsed.month}月：${parsed.days.length}日、${parsed.days.reduce((n,d)=>n+d.events.length,0)}レッスン。置き換えでは現在の日付別予定をすべて置き換えます。`:'取り込み内容：'+Object.entries(parsed).map(([g,r])=>`${({entry:'入会・登録料',general:'一般',junior:'ジュニア',family:'親子',other:'その他'})[g]} ${r.length}件`).join('、')+'。置き換えでは記載された区分の料金を置き換えます。';
        apply.disabled=false;
      }catch(e){status.textContent='読み込みエラー：'+e.message;}
    });
    box.append(button('現在の内容をCSV出力',()=>download(kind==='schedule'?oteCSV.exportSchedule(data):oteCSV.exportFees(data),kind+'-export.csv')));
    parent.append(box);
  }
  function renderEditor(){
  const open=[...root.querySelectorAll(':scope > details')].map(d=>d.open);root.replaceChildren();
  section('トップ：お知らせ',s=>list(s,data.news,{label:'INFORMATION',text:'',url:'',published:true},['label','text','url','published']));
  section('トップ：あなたに合う、ダンスがある。の写真',s=>['kids','general','family'].forEach(k=>field(s,data.photos,k,true)));
  section('入会のご案内：よくある質問',s=>list(s,data.faq,{question:'',answer:''},['question','answer']));
  section('スケジュール：月間表・日付別にチェック',s=>{
    csvControls(s,'schedule');
    ['year','month'].forEach(k=>field(s,data,k));field(s,data,'schedule_image',true);field(s,data,'schedule_alt');
    list(s,data.days,{day:'',weekday:'月',note:'',events:[]},['day','weekday','note'],true);
  });
  const row={name:'',amount:'',unit:'円'};
  section('料金：CSVインポート・出力',s=>csvControls(s,'fees'));
  [['entry','料金：入会金・登録料'],['general','料金：一般クラス'],['junior','料金：ジュニアコース'],['family','料金：キッズ親子クラス'],['other','料金：その他']].forEach(([k,t])=>section(t,s=>list(s,data[k],row,['name','amount','unit'])));
  [...root.querySelectorAll(':scope > details')].forEach((d,i)=>d.open=!!open[i]);
  }
  let dirty=false;
  renderEditor();
  root.addEventListener('input',()=>dirty=true);root.addEventListener('click',e=>{if(e.target.closest('button'))dirty=true;});
  window.addEventListener('beforeunload',e=>{if(dirty){e.preventDefault();e.returnValue='';}});
  document.getElementById('ote-form').addEventListener('submit',()=>{document.getElementById('ote-json').value=JSON.stringify(data);dirty=false;});
})();
