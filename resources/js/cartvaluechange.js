function decrease(id){
    let value = document.getElementById(id).value ;
    value--
    document.getElementById(id).value = value;
    axios.delete('/cart/delete/'+id).then(res=>{
        console.log(res)
    })
}

function increase(id){
    let value = document.getElementById(id).value ;
    value++
    document.getElementById(id).value = value;
    axios.put('/cart/'+id).then(res=>{
        console.log(res)
    })
}

