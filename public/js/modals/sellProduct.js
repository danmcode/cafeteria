
let modalSellProduct = document.getElementById('modalSellProduct')
modalSellProduct.addEventListener('show.bs.modal', function(event) {

    let showAlert = modalSellProduct.querySelector('.show-error');
    showAlert.style.display = "none";

    // Button that triggered the modal
    let button = event.relatedTarget
    // Extract info from data-bs-* attributes

    let id = button.getAttribute('data-bs-id');
    let name = button.getAttribute('data-bs-name');
    let stock = button.getAttribute('data-bs-stock');

    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    let modalTitle = modalSellProduct.querySelector('.modal-title');
    let inputAmountToSell = modalSellProduct.querySelector('#amount-to-sell');
    let sellBtn = modalSellProduct.querySelector('.sell-btn');
    let inputValue;

    modalTitle.textContent = `Vender Producto: ${name} - Cantidad: ${stock}`;
    
    inputAmountToSell.addEventListener('input', (event) => {
        inputValue = event.target.value;
        let onStock = stock - inputValue;
        
        if(onStock < 0){
            sellBtn.style.display = "none";
            showAlert.style.display = "block";
            modalTitle.textContent = `Vender Producto: ${name} - Cantidad: 0`;

        }else{
            modalTitle.textContent = `Vender Producto: ${name} - Cantidad: ${onStock}`;
            showAlert.style.display = "none";
            sellBtn.style.display = "block";

            let getFormUpdate = modalSellProduct.querySelector('.sell-product');
            getFormUpdate.action = `productos/${id}/${inputValue}`;
        }
    });




});