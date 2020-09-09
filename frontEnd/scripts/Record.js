let table = document.getElementById('table')

const GetSaleHeader = ()=> {
    fetch('../../backend/App/Services/Sales/GetSaleHeader.php', {
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
            <th scope="row">${item.sale_number}</th>
            <td>${item.client} - ${item.dni}</td>
            <td>${item.user}</td>
            <td>${item.total}</td>
            <td>${item.create_at}</td>
            <td>
            <a href="pdf.php?idSale=${item.sale_number}">
            <button class="ml-2 btn btn-warning text-body">
            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
            </svg>
            </button>
            </a>
            </td>
            </tr>
            `
})

table.innerHTML = dataTable

}



GetSaleHeader()