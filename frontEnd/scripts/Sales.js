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

const printSaleData = ()=>{
    let a = selectProduct.textContent
    let b = selectClient.value
    let c = document.getElementById('inputCand').value
    console.log([a,b,c]);
    
}



GetDataSelectClient()
GetDataSelectProduct()


$(document).ready(function() {
    
});


