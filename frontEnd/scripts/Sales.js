let selectClient = document.getElementById('selectClient')
let selectProduct = document.getElementById('selectProduct')
let dataTableBody = []

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
        `<option value="${item.id}">${item.code}</option>`;
    })

    selectProduct.innerHTML = `<option value="0">Selecionar</option>`+ dataSelect
    
}

selectProduct.addEventListener('change',()=>{
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

const getSaleNumber = ()=>{
    let content = document.getElementById('contentSaleNumber')
    fetch('../../backend/App/Services/Sales/GetSaleNumber.php',{
        method:'get',
        body:null
    })
    .then(response=>response.json())
    .then(data=>{
        if(data){
            num = parseInt(data[0].sale_number)
            content.innerHTML = `Factura # ${num+1}`
            document.getElementById('inputSaleNumber').value = num
        }else{
            content.innerHTML = `Factura # ${1}`
            document.getElementById('inputSaleNumber').value = 0
        }
        
    })
    
}

const disableSelectClient = ()=>{
    document.getElementById('selectClient').setAttribute('disabled','disabled')
}

const enableSelectClient = ()=>{
    document.getElementById('selectClient').removeAttribute('disabled')
}

const injectDataObj = ()=>{
    
    let codeIndex = document.getElementById('selectProduct').selectedIndex
    let codeString =  document.getElementById('selectProduct').options[codeIndex].textContent
    let codeValue = document.getElementById('selectProduct').value 
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

    disableSelectClient()

    if(codeValue==0 ){
        enableSelectClient()
        Swal.fire({
            position: 'Center',
            icon: 'error',
            title: 'Debes elegir un producto',
            showConfirmButton: false,
            timer: 1500
        })
    }
    else if(client == 0){
        enableSelectClient()
        Swal.fire({
            position: 'Center',
            icon: 'error',
            title: 'Debes elegir un Cliente',
            showConfirmButton: false,
            timer: 1500
        })
    }
    else if(cand <= 0){
        enableSelectClient()
        Swal.fire({
            position: 'Center',
            icon: 'error',
            title: 'La cantidad del producto debe ser mayor a 0',
            showConfirmButton: false,
            timer: 1500
        })
    }
    else if(stock <= 0){
        enableSelectClient()
        Swal.fire({
            position: 'Center',
            icon: 'error',
            title: 'Existencia en stock insuficiente',
            showConfirmButton: false,
            timer: 1500
        })
    }
    else{

    let number = document.getElementById('inputSaleNumber').value

    let obj = 
    { 
        id_client:client,
        id_product:codeValue,
        id_user:user,
        price:price,
        total:total,
        sale_number:parseInt(number)+1,
        code:codeString,
        description:description,
        cand:cand
    }

    dataTableBody.push(obj)
    PrintTableBody(dataTableBody)
    console.log(dataTableBody);
    }
}

const cleanFormSale = ()=>{
    document.getElementById('selectClient').value = 0
    document.getElementById('selectProduct').value = 0
    document.getElementById('textArea').textContent = ''
    document.getElementById('inputPrice').value = 0
    document.getElementById('inputCand').value = 0
    document.getElementById('inputStock').value = 0
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
        <td colspan="4" class="font-weight-bold h5">TOTAL:</td>
        <td colspan="1" class="font-weight-bold h3">${count}$</td>
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
            cleanFormSale()
            enableSelectClient()
        Swal.fire(
            'Lista Vacia',
            'Operacion exitosa',
            'success'
        )
        }
    })
}

const createSale = ()=>{
    
    console.log(dataTableBody);
    dataTableBody.forEach(item => {
        let data = new FormData()
        data.append('id_client',item.id_client)
        data.append('id_product',item.id_product)
        data.append('id_user',item.id_user)
        data.append('price',item.price)
        data.append('cand',item.cand)
        data.append('total',item.total) 
        data.append('sale_number',item.sale_number)
        
        fetch('../../backend/App/Services/Sales/add.php',{
            method:'POST',
            body:data  
        })
        .then(response=>response.json())
        .then(data=>{
            console.log(data);
            getSaleNumber()
            dataTableBody = []
            PrintTableBody(dataTableBody)
            cleanFormSale()
            enableSelectClient()
            Swal.fire({
                position: 'Center',
                icon: 'success',
                title: 'Venta exitosa :D',
                showConfirmButton: false,
                timer: 1500
            })

        })
    });

}

PrintTableBody(dataTableBody)
GetDataSelectClient()
GetDataSelectProduct()
getSaleNumber()
$(document).ready(function() {

});


