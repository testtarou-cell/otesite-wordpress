(() => {
  'use strict';
  const data = oteEditor.data;
  const root = document.getElementById('ote-editor');
  const labels = {label:'分類ラベル',text:'お知らせ本文',url:'リンク（空欄ならスケジュール）',published:'公開する',question:'質問',answer:'回答',name:'名称',amount:'金額（要相談なども入力可）',unit:'単位',day:'日',weekday:'曜日（月〜日）',note:'補足',time:'時間',month:'月',year:'年（未確認なら空欄）',schedule_image:'月間表の画像',schedule_alt:'月間表の説明',kids:'キッズ・ジュニアの写真',general:'一般クラスの写真',family:'キッズ親子クラスの写真'};
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
  section('トップ：お知らせ',s=>list(s,data.news,{label:'INFORMATION',text:'',url:'',published:true},['label','text','url','published']));
  section('トップ：あなたに合う、ダンスがある。の写真',s=>['kids','general','family'].forEach(k=>field(s,data.photos,k,true)));
  section('入会のご案内：よくある質問',s=>list(s,data.faq,{question:'',answer:''},['question','answer']));
  section('スケジュール：月間表・日付別にチェック',s=>{
    ['year','month'].forEach(k=>field(s,data,k));field(s,data,'schedule_image',true);field(s,data,'schedule_alt');
    list(s,data.days,{day:'',weekday:'月',note:'',events:[]},['day','weekday','note'],true);
  });
  const row={name:'',amount:'',unit:'円'};
  [['entry','料金：入会金・登録料'],['general','料金：一般クラス'],['junior','料金：ジュニアコース'],['family','料金：キッズ親子クラス'],['other','料金：その他']].forEach(([k,t])=>section(t,s=>list(s,data[k],row,['name','amount','unit'])));
  let dirty=false;
  root.addEventListener('input',()=>dirty=true);root.addEventListener('click',e=>{if(e.target.closest('button'))dirty=true;});
  window.addEventListener('beforeunload',e=>{if(dirty){e.preventDefault();e.returnValue='';}});
  document.getElementById('ote-form').addEventListener('submit',()=>{document.getElementById('ote-json').value=JSON.stringify(data);dirty=false;});
})();
