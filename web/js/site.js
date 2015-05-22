/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var parent;
$(function(){
    $('#add-item').on('click',function(){
        addItem();
    })
    $('#remove-item').on('click',function(){
        removeItem();
    })
    parent = $('.orders-container');
    item = $('div.order-container').html();
})

function addItem(){
    var d = "<div class='order-container'data-counter="+(parent.find('div.order-container').length)+">"+item+"</div>";
    parent.prepend(d);
}
function removeItem(){
    if(parent.find('div.order-container').length<1){
        console.log(parent.find('div.order-container').length);
        alert('Can\'t remove the original item');
    }
    parent.find('div.order-container').first().remove();
}

function submitForm(){
    //e.preventDefault();
    var d = Array();
    $.each(parent.find('div.order-container'),function(i,v){
        var single = Array();
        var price = $(v).find('#orders-price').val();
        var description = $(v).find('#orders-description').val();
        var available = $(v).find('#orders-available').val();
        d.push({'price':price,'descr':description,'available':available}) ;
    });
    console.log(d);
    $.ajax({
        type:'POST',
        url:'/orders/create',
        data:{orders:d},
        beforeSend:function(){
        },
        success:function(data){
            console.log('miban');
        }
    })
}