$(function(){
    var saleValue = $(".sale-value").text();
    formatedSaleValue = saleValue.toLocaleString('pt-BR',{style: 'currency', currency: 'BRL'});
    saleValueText = $(".sale-value");
    saleValueText.text(formatedSaleValue);

    console.log(saleValue, formatedSaleValue);
});
