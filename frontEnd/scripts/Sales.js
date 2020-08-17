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
            console.log(data);
            document.getElementById('inputStock').value = data.stock
            document.getElementById('inputPrice').value = data.price+'$'
            document.getElementById('textArea').textContent = data.description
        })
    }else{
        document.getElementById('inputStock').value = ''
            document.getElementById('inputPrice').value = ''
            document.getElementById('textArea').textContent = ''
    }
    
})






GetDataSelectClient()
GetDataSelectProduct()


$(document).ready(function() {

});


