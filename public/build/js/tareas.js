!function(){!async function(){try{const a="/api/tareas?id="+c(),n=await fetch(a),o=await n.json();e=o.tareas,t()}catch(e){console.log(e)}}();let e=[];function t(){if(function(){const e=document.querySelector("#listado-tareas");for(;e.firstChild;)e.removeChild(e.firstChild)}(),0===e.length){const e=document.querySelector("#listado-tareas"),t=document.createElement("LI"),a=document.createElement("LI");return a.classList.add("spider"),t.textContent="No recent tags to show",t.classList.add("no-tareas"),e.appendChild(a),void e.appendChild(t)}const n={0:"Pending",1:"Complete"};e.forEach(r=>{const d=document.createElement("LI");d.dataset.tareaId=r.id,d.classList.add("tarea");const s=document.createElement("P");s.textContent=r.nombre,s.ondblclick=function(){a(editar=!0,{...r})};const i=document.createElement("DIV");i.classList.add("opciones");const l=document.createElement("BUTTON");l.classList.add("estado-tarea"),l.classList.add(""+n[r.estado].toLowerCase()),l.textContent=n[r.estado],l.dataset.estadoTarea=r.estado,l.ondblclick=function(){!function(e){const t="1"===e.estado?"0":"1";e.estado=t,o(e)}({...r})};const m=document.createElement("BUTTON");m.classList.add("eliminar-tarea"),m.dataset.idTarea=r.id,m.textContent="Delete",m.ondblclick=function(){!function(a){Swal.fire({title:"¿Eliminar etiqueta?",showCancelButton:!0,confirmButtonText:"Sí",cancelButtonText:"No"}).then(n=>{n.isConfirmed&&async function(a){const{estado:n,id:o,nombre:r}=a,d=new FormData;d.append("id",o),d.append("nombre",r),d.append("estado",n),d.append("proyectoId",c());try{const n="http://localhost:3000/api/tarea/eliminar",o=await fetch(n,{method:"POST",body:d}),c=await o.json();c.resultado&&(Swal.fire("Eliminado",c.mensaje,"success"),e=e.filter(e=>e.id!==a.id),t())}catch(e){}}(a)})}({...r})},i.appendChild(l),i.appendChild(m),d.appendChild(s),d.appendChild(i);document.querySelector("#listado-tareas").appendChild(d)})}function a(a=!1,r={}){console.log(r);const d=document.createElement("DIV");d.classList.add("modal"),d.innerHTML=`\n            <form class="formulario nueva-tarea">\n                <legend>${a?"Edit tag":"Add a new tag"}</legend>\n                <div class="campo">\n                    <label>Tag</label>\n                    <input type="text" name="tarea" placeholder="${r.nombre?"Edit tag":"Add a tag to the current project"}" id="tarea" value="${r.nombre?r.nombre:""}"/>\n                </div>\n                <div class="opciones">\n                    <input type="submit" class="submit-nueva-tarea" value="${r.nombre?"Save changes":"Add tag"}"/>\n                    <button type="button" class="cerrar-modal">Cancel</button>\n                </div>\n            </form>\n        `,setTimeout(()=>{document.querySelector(".formulario").classList.add("animar")},0),d.addEventListener("click",(function(s){if(s.preventDefault(),s.target.classList.contains("cerrar-modal")){document.querySelector(".formulario").classList.add("cerrar"),setTimeout(()=>{d.remove()},500)}if(s.target.classList.contains("submit-nueva-tarea")){const d=document.querySelector("#tarea").value.trim();if(""===d)return void n("Tag name is required","error",document.querySelector(".formulario legend"));a?(r.nombre=d,o(r)):async function(a){const o=new FormData;o.append("nombre",a),o.append("proyectoId",c());try{const c="http://localhost:3000/api/tarea",r=await fetch(c,{method:"POST",body:o}),d=await r.json();if(n(d.mensaje,d.tipo,document.querySelector(".formulario legend")),"exito"===d.tipo){const n=document.querySelector(".modal");setTimeout(()=>{n.remove()},2e3);const o={id:String(d.id),nombre:a,estado:"0",proyectoId:d.proyectoId};e=[...e,o],t()}}catch(e){console.log(e)}}(d)}})),document.querySelector(".dashboard").appendChild(d)}function n(e,t,a){const n=document.querySelector(".alerta");n&&n.remove();const o=document.createElement("DIV");o.classList.add("alerta",t),o.textContent=e,a.parentElement.insertBefore(o,a.nextElementSibling),setTimeout(()=>{o.remove()},2e3)}async function o(a){const{estado:n,id:o,nombre:r,proyectoId:d}=a,s=new FormData;s.append("id",o),s.append("nombre",r),s.append("estado",n),s.append("proyectoId",c());try{const a="http://localhost:3000/api/tarea/actualizar",c=await fetch(a,{method:"POST",body:s}),d=await c.json();if("exito"===d.respuesta.tipo){Swal.fire(d.respuesta.mensaje,d.respuesta.mensaje,"success");const a=document.querySelector(".modal");a&&a.remove(),e=e.map(e=>(e.id===o&&(e.estado=n,e.nombre=r),e)),t()}}catch(e){console.log(e)}}function c(){const e=new URLSearchParams(window.location.search);return Object.fromEntries(e.entries()).id}document.querySelector("#agregar-tarea").addEventListener("click",(function(){a()}))}();