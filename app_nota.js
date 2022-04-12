document.getElementById('formulario_nota').addEventListener('submit', function(e) {
    
    e.preventDefault();

    let formulario_nota = new FormData(document.getElementById('formulario_nota'));

    fetch('agregar_nota.php', {
        method: 'POST',
        body: formulario_nota
    })
    .then(res => res.json())
    .then(data => {
        if(data == 'true') {
            document.getElementById('txt_titulo').value = '';
            document.getElementById('txt_descripcion').value = '';
            alert('La nota se insertó correctamente.');
        } else {
            console.log(data);
        }
    });


});

fetch('nota.php')
.then(res => res.json())
.then(data => {
    console.log(data);

    let str = '';
    data.map(item => {
        str +=`<tr>
                 <td>${item.titulo}</td>
                 <td>${item.descripcion_nota}</td>
               </tr>`    })
               document.getElementById('table_data_nota').innerHTML = str;

});