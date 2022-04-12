document.getElementById('formulario_tarea').addEventListener('submit', function(e) {
    
    e.preventDefault();

    let formulario_tarea = new FormData(document.getElementById('formulario_tarea'));

    fetch('agregar_tarea.php', {
        method: 'POST',
        body: formulario_tarea
    })
    .then(res => res.json())
    .then(data => {
        if(data == 'true') {
            document.getElementById('txt_descripcion_tarea').value = '';
            document.getElementById('txt_estado_tarea').value = '';
            alert('La tarea se insertó correctamente.');
        } else {
            console.log(data);
        }
    });

 


});


fetch('tarea.php')
.then(res => res.json())
.then(data => {
    console.log(data);

    let str = '';
    data.map(item => {
        str +=`<tr>
                 <td>${item.descripcion_tarea}</td>
                 <td>${item.estado_tarea}</td>
               </tr>`    })
               document.getElementById('table_data_tarea').innerHTML = str;

});