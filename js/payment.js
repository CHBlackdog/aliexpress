/**
 * Created by chenghaibo on 2017/3/21.
 */
function calculateSubtotal(way) {
//        alert('calculateSubtotal');
    var deliver_price = 0;//运费
    var count = document.getElementById("count");
    var price = document.getElementById("price");
    var subtotal = document.getElementById("subtotal");
    var itemtotal = document.getElementById("itemtotal");
    var count_value = parseInt(count.value);
    var item_price = parseInt(price.innerHTML);
    var subtotal_value = parseFloat(subtotal.innerHTML);
    if (way == 'jia') {
        count_value = count_value + 1;
        subtotal_value = subtotal_value + item_price;
    }
    else {
        if (count_value > 1) {
            count_value = count_value - 1;
            subtotal_value = subtotal_value - item_price;
        }
    }

    var itemtotal_value = subtotal_value + deliver_price;

    count.innerHTML = count_value;
    count.value = count_value;
    subtotal.innerHTML = subtotal_value;
    itemtotal.innerHTML = itemtotal_value;
}

