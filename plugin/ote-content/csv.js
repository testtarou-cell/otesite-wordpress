(function (scope) {
  'use strict';
  const scheduleHeaders=['年','月','日','曜日','時間','名称','補足','日付補足'];
  const feeHeaders=['区分','名称','金額','単位'];
  const groups={'入会・登録料':'entry','一般':'general','ジュニア':'junior','親子':'family','その他':'other'};
  function parse(text) {
    text=text.replace(/^\uFEFF/,'');
    const rows=[];let row=[],value='',quoted=false,closed=false;
    const cell=()=>{row.push(value);value='';closed=false;};
    for(let i=0;i<text.length;i++){
      const c=text[i];
      if(quoted){if(c==='"'){if(text[i+1]==='"'){value+='"';i++;}else{quoted=false;closed=true;}}else value+=c;continue;}
      if(c==='"'){if(value!==''||closed)throw Error('引用符の位置が不正です。');quoted=true;}
      else if(c===',')cell();
      else if(c==='\n'||c==='\r'){if(c==='\r'&&text[i+1]==='\n')i++;cell();if(row.some(v=>v.trim()!==''))rows.push(row);row=[];}
      else {if(closed)throw Error('引用符の後にはカンマか改行が必要です。');value+=c;}
    }
    if(quoted)throw Error('引用符が閉じられていません。');
    cell();if(row.some(v=>v.trim()!==''))rows.push(row);
    return rows;
  }
  function records(text,headers){
    const rows=parse(text);if(rows.length<2)throw Error('見出しと1件以上のデータが必要です。');
    const head=rows.shift().map(s=>s.trim());
    if(head.length!==headers.length||new Set(head).size!==head.length||headers.some(h=>!head.includes(h)))throw Error('CSVの見出しは「'+headers.join(',')+'」にしてください。');
    return rows.map((r,i)=>{if(r.length!==head.length)throw Error(`${i+2}行目の列数が違います。`);return Object.fromEntries(head.map((h,j)=>[h,r[j]]));});
  }
  function schedule(text){
    const rows=records(text,scheduleHeaders);const days=new Map();let year,month;
    rows.forEach((r,i)=>{
      const line=i+2,y=r['年'].trim(),m=r['月'].trim(),day=r['日'].trim(),wd=r['曜日'].trim();
      if(!/^\d{1,2}$/.test(m)||+m<1||+m>12||!/^\d{1,2}$/.test(day)||+day<1||+day>31||!['月','火','水','木','金','土','日'].includes(wd)|| (y!==''&&(!/^\d{4}$/.test(y)||+y<1900)))throw Error(`${line}行目の年月日・曜日を確認してください。`);
      if(year===undefined){year=y;month=String(+m);}else if(year!==y||month!==String(+m))throw Error('1つのCSVには同じ年・月の予定を入れてください。');
      const max=y?new Date(+y,+m,0).getDate():new Date(2000,+m,0).getDate();if(+day>max)throw Error(`${line}行目の日付は存在しません。`);
      let d=days.get(+day);
      if(!d){d={day:String(+day),weekday:wd,note:r['日付補足'],events:[]};days.set(+day,d);}
      else if(d.weekday!==wd||d.note!==r['日付補足'])throw Error(`${line}行目の同じ日の曜日・日付補足が一致しません。`);
      if(r['名称'].trim()===''){if(r['時間'].trim()||r['補足'].trim())throw Error(`${line}行目：レッスンの名称を入力してください。`);}
      else d.events.push({time:r['時間'],name:r['名称'],note:r['補足']});
    });
    return {year,month,days:[...days.values()].sort((a,b)=>+a.day-+b.day)};
  }
  function fees(text){
    const out={};records(text,feeHeaders).forEach((r,i)=>{
      const key=groups[r['区分'].trim()];if(!key)throw Error(`${i+2}行目の区分は「${Object.keys(groups).join('、')}」から選んでください。`);
      if(!r['名称'].trim()||!r['金額'].trim())throw Error(`${i+2}行目：名称と金額は必須です。`);
      (out[key]??=[]).push({name:r['名称'],amount:r['金額'],unit:r['単位']});
    });return out;
  }
  function encode(rows){return '\uFEFF'+rows.map(r=>r.map(v=>'"'+String(v??'').replace(/"/g,'""')+'"').join(',')).join('\r\n')+'\r\n';}
  function exportSchedule(data){const rows=[scheduleHeaders];data.days.forEach(d=>{(d.events.length?d.events:[{time:'',name:'',note:''}]).forEach(e=>rows.push([data.year,data.month,d.day,d.weekday,e.time,e.name,e.note,d.note]));});return encode(rows);}
  function exportFees(data){const rows=[feeHeaders];Object.entries(groups).forEach(([label,key])=>data[key].forEach(r=>rows.push([label,r.name,r.amount,r.unit])));return encode(rows);}
  scope.oteCSV={parse,schedule,fees,exportSchedule,exportFees};
})(typeof window==='undefined'?globalThis:window);
