// asynchronous
function tambah(a, b, callback) {
  setTimeout(function() { 
    callback(a + b) 
  }, 1000);
}

function kali(a, b, callback) {
  setTimeout(function() { 
    callback(a * b) 
  }, 1000);
}

function kurang(a, b, callback) {
  setTimeout(function() { callback(a - b) }, 1000);
}
let ftambah = tambah(1, 2, function(x) {

  kali(x, 2, function(y) {
    kurang(y, 2, function(z) {
      kali(z, y,function(n){
        console.log(n)
      })
      console.log('async' + z)
    })
  })

  return kali(x, 3, function(y) {
    return y
  })

})
console.log(ftambah)

  // // synchronous
  // function wait(ms) {
  //   var start = Date.now(),
  //     now = start;
  //   while (now - start < ms) {
  //     now = Date.now();
  //   }
  // }

  // function stambah(a, b) {
  //   wait(1000)
  //   return a + b
  // }

  // function skali(a, b) {
  //   wait(1000)
  //   return a * b
  // }

  // function skurang(a, b) {
  //   console.log(a, b)
  //   wait(1000)
  //   var c = a - b
  //   if (c < 0) {
  //     a = a + 2
  //     return skurang(a, b)
  //   } else {
  //     return c
  //   }
  // }
  // var x = stambah(1, 2)
  // var y = skali(x, 2)
  // var z = skurang(y, 12)
  // console.log('sync' + z)
  // console.log("sync * 3: " + skali(x, 3))

