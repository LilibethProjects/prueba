document.getElementById('formulario').addEventListener('submit', function(e) {
    
    e.preventDefault();

    let formulario = new FormData(document.getElementById('formulario'));

    fetch('agregar.php', {
        method: 'POST',
        body: formulario
    })
    .then(res => res.json())
    .then(data => {
        if(data == 'true') {
            document.getElementById('txt_nombre').value = '';
            document.getElementById('txt_apellido').value = '';
            document.getElementById('txt_telefono').value = '';
            alert('El usuario se insertó correctamente.');
        } else {
            console.log(data);
        }
    });

 


});
fetch('listar.php')
.then(res => res.json())
.then(data => {
    console.log(data);

    let str = '';
    data.map(item => {
        str +=`<tr>
                 <td>${item.nombre}</td>
                 <td>${item.apellido}</td>
                 <td>${item.telefono}</td>
               </tr>`    })
               document.getElementById('table_data').innerHTML = str;

});



