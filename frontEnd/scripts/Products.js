
let table = document.getElementById('table')
    let formAdd = document.getElementById('formAdd')

    const getDataProducts = () => {
        fetch('../../backend/App/Services/Products/Get.php', {
        method: 'GET',
        body: null
    })
        .then(res => res.json())
        .then(data => {
        printData(data)
        })
    }



    const printData = (ob) => {
        let dataTable = ``
        ob.forEach(item => {
        dataTable +=
        `
                <tr>
                <th scope="row">${item.id}</th>
                <td>${item.code}</td>
                <td>${item.description}</td>
                <td>${item.price}</td>
                <td>${item.cost}</td>
                <td>${item.stock}</td>
                <td>
                <button class="btn btn-warning text-body" onclick="modalEdit(${item.id},${item.price},${item.cost},${item.stock})" data-toggle="modal" data-target="#ModalEdit">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                </svg>
                </button>
                </td>
                <td>
                <button class="ml-2 btn btn-danger text-body" onclick="alertDelete(${item.id})">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
                </button>
                </td>
                </tr>
                `
    })

    table.innerHTML = dataTable

    }

    const addProduct = () => {
        data = new FormData(formAdd)
        fetch('../../backend/App/Services/Products/Add.php', {
        method: 'Post',
        body: data
    })
        .then(res => res.json())
        .then(data => {
            console.log(data);
            getDataProducts()
            if(data){
            Swal.fire(
            'Exito!',
            'Producto agregado con exito!',
            'success'  )

            }else{
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes llenar los campos obligatorios!',
            })

            }
        })
        
    }

    const GetDataSelect = ()=> {
        fetch('../../backend/App/Services/Providers/GetProviders.php', {
            method: 'GET',
            body: null
        })
            .then(res => res.json())
            .then(data => {
            insertDataSelect(data)
            })
    }

    const insertDataSelect = (ob) =>{
        const select = document.getElementById('select')
        let dataSelect=``
        ob.forEach(item =>{
            dataSelect += 
            `<option value="${item.id}">${item.name}</option>`
        })

        select.innerHTML = dataSelect
    }

    const deleteProduct = (id) =>{
        const data = new FormData;
        data.append('id',id)
        fetch('../../backend/App/Services/Products/Delete.php', {
        method: 'POST',
        body: data
    })
        .then(res => res.json())
        .then(data => {
            getDataProducts()
        })
    }


    const alertDelete = (id) =>{
        console.log(id);
        Swal.fire({
        title: 'Seguro que deseas eliminar este elemento?',
        text: "Esta accion es ireversible!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminar!'
        })
    .then((result) => {
        if (result.value) {
        deleteProduct(id)
        Swal.fire(
            'Eliminado!',
            'El elemnto fue eliminado con exito.',
            'success'
        )
        }
    })
    }


    const modalEdit = (id,price,cost,stock)=>{
        document.getElementById('id').value = id
        document.getElementById('priceEdit').value = price
        document.getElementById('costEdit').value = cost
        document.getElementById('stockEdit').value = stock
        document.getElementById('codeEdit').value = ''
        document.getElementById('descripEdit').value = ''
    }

    const cleanModalAdd = ()=>{
        document.getElementById('priceAdd').value = ''
        document.getElementById('costAdd').value = ''
        document.getElementById('stockAdd').value = ''
        document.getElementById('codeAdd').value = ''
        document.getElementById('descripAdd').value = ''
    }

    const editProduct = () =>{
        data = new FormData(formEdit)
        fetch('../../backend/App/Services/Products/Edit.php', {
        method: 'Post',
        body: data
    })
        .then(res => res.json())
        .then(data => {
            getDataProducts()
            console.log(data);
            if(data){
            Swal.fire(
            'Exito!',
            'Proveedor Editado con exito!',
            'success'  )

            }else{
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Debes llenar los campos obligatorios!',
        })

        }
        })
    }
    

    getDataProducts()

    GetDataSelect()

    $(document).ready(function() {
        $('select').select2();
    });


    