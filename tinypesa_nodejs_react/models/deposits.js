const mongoose = require('mongoose')
const crypto = require("crypto");
const id = crypto.randomBytes(6).toString("hex");
const date= new Date
year = date.getFullYear()
month = date.getMonth()
day = date.getDate()
hours = date.getHours()
minutes = date.getMinutes()
today = year+':'+ month + ':' + day +' ' + hours + ':' + minutes

const Deposits = new mongoose.Schema({
    phone:{type: Number, required:true},
    amount:{type: Number, required:true},
    mpesa_ref:{type: String, required:true},
    created:{type: String, default:today}
})

const model = mongoose.model('Deposits', Deposits)

module.exports = model 