let cantidad = document.getElementById("cantidad")
let metodo = document.getElementById("tips")
let price = document.getElementById("precio")
let cantidadMostrar = document.getElementById("canti")
let cuotaMostrar = document.getElementById("cuota")
let resultadoMostrar = document.getElementById("result")
let inputs = document.querySelectorAll("input")
let reset = document.getElementById("reset")
let metodov = 0
let cuota = 0
let total = 0


function Valor(valor){
    metodov = valor
    return metodov
}

function calcular(){
    Valor(metodov)
    cuota = ((+price.value * (metodov / 100))).toFixed(2)
    total = (((+price.value * (metodov / 100)) + +price.value)).toFixed(2)
    console.log(metodov)
    cantidadMostrar.innerHTML = +cantidad
    cuotaMostrar.innerHTML = +cuota
    resultadoMostrar.innerHTML = +total
}

reset.addEventListener('click',()=>{
    inputs.forEach(input=>input.value='')
})
