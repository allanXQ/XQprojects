const mongoose = require('mongoose')
////const crypto = require("crypto");
const uuid = require('uuid')
//const id1 = crypto.randomBytes(3).toString("hex");
//const id2 = Math.floor(Math.random() * 100); 
const id = uuid.v4()
console.log(id)
const role = require('../middleware/roles')
// const Portfolio = require('./portfolio')
userole = role.user
const date= new Date
year = date.getFullYear()
month = date.getMonth()
day = date.getDate()
today = year+':'+ month + ':' + day


const users = mongoose.Schema({
    userid:{type: String},
    role:{type:String, default:userole},
    username:{type:String, required:true, unique:true},
    email:{type:String, required:true, unique:true},
    phone:{type:Number, required:true, unique:true},
    balance:{type:Number, default:50},
    status:{type:String, default:'inactive'},
    pro:{type:Boolean, default:false},
    referrer:{type:String, default:'none'},
    password:{type: String, required:true},
    created:{type:String, default:today}
})

const model = mongoose.model('users', users)
//const portfolio = mongoose.model('portfolio', Portfolio)

module.exports = model
//module.exports = portfolio