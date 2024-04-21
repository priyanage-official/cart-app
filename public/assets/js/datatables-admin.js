// window.addEventListener('DOMContentLoaded', event => {
//     // Simple-DataTables
//     // https://github.com/fiduswriter/Simple-DataTables/wiki

//     const datatablesSimple = document.getElementById('datatablesSimple');
//     if (datatablesSimple) {
//         new simpleDatatables.DataTable(datatablesSimple, {
//             ajax: 'scripts/server_processing.php',
//             processing: true,
//             serverSide: true
//         });
//     }
// });

$(document).ready(function () {
    var table = $('#customerListDatatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "http://127.0.0.1:8000/customer-fetch",
        columns: [
            { data: 'profile_pic', name: 'profile_pic' },
            { data: 'fullname', name: 'fullname' },
            { data: 'email_id', name: 'email_id' },
            { data: 'username', name: 'username' },
            { data: 'contact_no', name: 'contact_no' },
            { data: 'address', name: 'address' },
            { data: 'dob', name: 'dob' }
        ]
    });

    var table2 = $('#vendorListDatatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "http://127.0.0.1:8000/vendor-fetch",
        columns: [
            { data: 'profile_pic', name: 'profile_pic' },
            { data: 'fullname', name: 'fullname' },
            { data: 'email_id', name: 'email_id' },
            { data: 'username', name: 'username' },
            { data: 'contact_no', name: 'contact_no' },
            { data: 'address', name: 'address' },
            { data: 'dob', name: 'dob' }
        ]
    });

    var table3 = $('#productListDatatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "http://127.0.0.1:8000/product-fetch",
        columns: [
            { data: 'product_image', name: 'product_image' },
            { data: 'product_name', name: 'product_name' },
            { data: 'product_price', name: 'product_price' },
            { data: 'product_description', name: 'product_description' }
        ]
    });
})
