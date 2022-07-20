// day 1
"use strict";
const asdf = 'we win'
let qwer = 'aosdiasliduh'
qwer = 'iaushd'
var axe = document.getElementById('page1')
axe.innerHTML = "halo"
var id2 = $("#page2")
$("#hide").click(function(){
  id2.hide()
})
$("#show").click(function(){
  id2.show()
})
$("#toggle").click(function(){
  id2.toggle()
})

// day 2
var arr1 = ["jeruk","apel","mangga","pisang"]
var arr2 = new Array(1,2,3)
var obj1 = {
  nama: "joni",
  umur: 12,
}
// console.log(arr1,arr2)

var obj2 = new Object()
obj2.nama = "joko"
obj2.umur = "22"
// console.log(obj1,obj2)

var json1 = JSON.stringify(arr1)
var json2 = JSON.stringify(obj1)
// console.log(json2)

var json3 = `[{"nama":"adi","umur":"12"},{"nama":"ado","umur":"22"}]`
// console.log(JSON.stringify(json3))
var data3 = JSON.parse(json3)
var umuradi = parseInt(data3[0].umur)

arr1.push("durian")
arr1.pop()
arr1.splice(1,2)
arr1[0] = "anggur"

obj2.nama = "budi"
obj2.tempatlahir = "sleman"

delete obj2.umur