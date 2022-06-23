const express = require('express')
const userpostroute = require('./routes/postuser')
const adminpostroute = require('./routes/postadmin')
const usergetroute = require('./routes/getuser')
const admingetroute = require('./routes/getadmin')
const bodyParser = require('body-parser')
const mongoose = require('mongoose')
const dotenv = require('dotenv').config()
const bcrypt = require('bcrypt')
const User = require('./models/users')
const cors = require('cors');
const path = require('path')
//const wss = require('./wss')

mongoose.connect(process.env.DATABASE, ()=>{console.log('connected to database')})
const app = express()

app.use(cors({
  origin: '*'
}));

//app.use('/', express.static(path.join(__dirname,'static')))
app.use(bodyParser.json())

app.use('/api/users', userpostroute)



if(process.env.NODE_ENV === 'production'){
  app.use(cors({
    origin: '*'
  }));
  app.use(express.static('ui/build'))
  app.get("*", (req,res)=>{
    res.sendFile(path.resolve(__dirname, 'ui', 'build', 'index.html'))
  })
}


express_port = process.env.PORT || 5000
app.listen(express_port, ()=>{
  console.log(`server started on port ${express_port}`)
})