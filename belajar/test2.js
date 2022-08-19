function op1(){
  console.log("hellow")
}
// op1()

var data1 = 20
var data2 = "10"
function op2(x=1,y=2){
  return x+y
}
// console.log(op2(data1,data2))

function op3(a,b){
  console.log(a+b)
}
op3(op2(data1,data2),data2)

function calc() {
  var angka1 = parseInt(document.getElementById('angka1').value)||0
  var angka2 = parseInt(document.getElementById('angka2').value)||0
  var operasi = document.getElementById('operasi').value
  var hasil = document.getElementById('hasil')
  var result = 0
    switch (operasi) {
      case "*":
        result = angka1 * angka2
        break;
      case "+":
        result = angka1 + angka2
        break;
      default:
        break;
    }

    hasil.value = result
}