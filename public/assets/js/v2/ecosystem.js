/* FusionCentrix V2 — ecosystem interaction */
(function(){
  function init(){
    const wrap=document.querySelector('.fc-hero-ecosystem');
    const svg=wrap?.querySelector('.fc-ecosystem-svg');
    if(!wrap||!svg)return;

    const nodes=[...svg.querySelectorAll('.fc-service')];
    const lines=[...svg.querySelectorAll('.fc-link')];
    const reduce=window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function activate(node){
      nodes.forEach(n=>n.classList.remove('is-active'));
      lines.forEach(l=>l.classList.remove('active'));
      node.classList.add('is-active');
      const line=svg.querySelector('#'+node.dataset.line);
      if(line)line.classList.add('active');
    }

    nodes.forEach(node=>{
      node.addEventListener('pointerenter',()=>activate(node));
      node.addEventListener('focus',()=>activate(node));
      node.addEventListener('click',()=>activate(node));
      node.addEventListener('keydown',e=>{
        if(e.key==='Enter'||e.key===' '){e.preventDefault();activate(node)}
      });
    });

    wrap.addEventListener('pointerleave',()=>{
      nodes.forEach(n=>n.classList.remove('is-active'));
      lines.forEach(l=>l.classList.remove('active'));
      if(!reduce)svg.style.transform='';
    });

    if(!reduce && window.matchMedia('(pointer:fine)').matches){
      wrap.addEventListener('pointermove',e=>{
        const r=wrap.getBoundingClientRect();
        const x=(e.clientX-r.left)/r.width-.5;
        const y=(e.clientY-r.top)/r.height-.5;
        svg.style.transform=`rotateY(${x*5}deg) rotateX(${-y*4}deg)`;
      });
    }
  }
  if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',init);else init();
})();
