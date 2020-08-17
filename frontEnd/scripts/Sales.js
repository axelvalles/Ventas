let selectClient = document.getElementById('selectClient')
let selectProduct = document.getElementById('selectProduct')

const GetDataSelectClient = ()=> {
    fetch('../../backend/App/Services/Clients/Get.php', {
        method: 'GET',
        body: null
    })
        .then(res => res.json())
        .then(data => {
        insertDataSelectClient(data)
        })
}

const insertDataSelectClient = (ob) =>{
    
    let dataSelect=``
    ob.forEach(item =>{
        dataSelect += 
        `<option value="${item.id}">${item.name}</option>`
    })

    selectClient.innerHTML = `<option value="0">Selecionar</option>`+ dataSelect
    
}

const GetDataSelectProduct = ()=> {
    fetch('../../backend/App/Services/Products/Get.php', {
        method: 'GET',
        body: null
    })
        .then(res => res.json())
        .then(data => {
        insertDataSelectProduct(data)
        })
}

const insertDataSelectProduct = (ob) =>{
    
    let dataSelect=``
    ob.forEach(item =>{
        dataSelect += 
        `<option value="${item.id}">${item.code}</option>`
    })

    selectProduct.innerHTML = `<option value="0">Selecionar</option>`+ dataSelect
    
}

selectProduct.addEventListener('change',(e)=>{
    const data = new FormData;
    data.append('id',selectProduct.value)
    if(data.get('id')>0){
        fetch('../../backend/App/Services/Products/Find.php',{
            method:'POST',
            body:data
        })
        .then(res => res.json())
        .then(data =>{
            document.getElementById('inputStock').value = data.stock
            document.getElementById('inputPrice').value = data.price
            document.getElementById('textArea').textContent = data.description
        })
    }else{
        document.getElementById('inputStock').value = ''
            document.getElementById('inputPrice').value = ''
            document.getElementById('textArea').textContent = ''
    }
    
})

let dataTableBody = []

const injectDataObj = ()=>{
    
    let codeValue = document.getElementById('selectProduct').selectedIndex
    let codeString =  document.getElementById('selectProduct').options[codeValue].textContent 
    let description = document.getElementById('textArea').textContent
    let price = document.getElementById('inputPrice').value
    let cand = document.getElementById('inputCand').value
    let client = document.getElementById('selectClient').value
    let user = document.getElementById('userId').value
    let stock = document.getElementById('inputStock').value
    
    price = parseInt(price)
    cand = parseInt(cand)
    codeValue = parseInt(codeValue)
    client = parseInt(client)
    user = parseInt(user)

    let total= price*cand

    if(codeValue==0 ){
        Swal.fire({
            position: 'Center',
            icon: 'error',
            title: 'Debes elegir un producto',
            showConfirmButton: false,
            timer: 1500
        })
    }
    else if(client == 0){
        Swal.fire({
            position: 'Center',
            icon: 'error',
            title: 'Debes elegir un Cliente',
            showConfirmButton: false,
            timer: 1500
        })
    }
    else if(cand <= 0){
        Swal.fire({
            position: 'Center',
            icon: 'error',
            title: 'La cantidad del producto debe ser mayor a 0',
            showConfirmButton: false,
            timer: 1500
        })
    }
    else if(stock <= 0){
        Swal.fire({
            position: 'Center',
            icon: 'error',
            title: 'Existencia en stock insuficiente',
            showConfirmButton: false,
            timer: 1500
        })
    }
    else{

    let obj = 
    { 
        id_client:client,
        id_product:codeValue,
        id_user:user,
        price:price,
        total:total,
        sale_number:1,
        code:codeString,
        description:description,
        cand:cand
    }

    dataTableBody.push(obj)
    PrintTableBody(dataTableBody)
    console.log(dataTableBody);
    }
}

const PrintTableBody = (ob)=>{
    let data =``
    let count = 0
    if(ob.length===0){
        data = 
        `
        <tr>
        <td>----</td>
        <td>----</td>
        <td>----</td>
        <td>----</td>
        <td>----</td>
        </tr>
        `
    }else{
        ob.forEach(item => {
            count = count + item.total
            data +=
            `
            <tr>
            <td>${item.code}</td>
            <td>${item.description}</td>
            <td>${item.price}</td>
            <td>${item.cand}</td>
            <td>${item.total}</td>
            </tr>
            `    
        })
    }
    
    let footerTable =
        `
        <tr>
        <td colspan="2">
        <button  class="btn btn-success">
        <span><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cart-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M11.354 5.646a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708 0z"/>
        <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
        </svg></span>
        Totalizar Venta</button></td>

        <td>
        <button onclick="destroySale()" class="btn btn-danger">
        <span>
        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
        </svg>
        </span>
        Cancelar</button>
        </td>
        <td class="font-weight-bold">TOTAL:</td>
        <td class="font-weight-bold">${count}$</td>
        </tr>
        `

    document.getElementById('tableBody').innerHTML = data + footerTable
}

const destroySale = () =>{
    Swal.fire({
        title: 'Vaciar Lista',
        text: "Estas seguro que deseas vaciar el carrito de compras?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            dataTableBody = []
            PrintTableBody(dataTableBody)
        Swal.fire(
            'Lista Vacia',
            'Operacion exitosa',
            'success'
        )
        }
    })
}

PrintTableBody(dataTableBody)



GetDataSelectClient()
GetDataSelectProduct()


$(document).ready(function() {

});


