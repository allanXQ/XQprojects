//import * as React from 'react';
import { Typography } from '@mui/material'
import {styled} from '@mui/system'
import React, { useEffect, useState } from 'react'
import { Link } from 'react-router-dom'
import LoginButton from './button'
import {useForm} from 'react-hook-form'
//import './style.css'
import Stack from '@mui/material/Stack';
import Button from '@mui/material/Button';
import Snackbar from '@mui/material/Snackbar';
import MuiAlert from '@mui/material/Alert';
import { createStyles } from '@mui/styles'
import { makeStyles } from '@mui/styles'
import { useNavigate } from 'react-router-dom'
import { connect } from 'react-redux'
import DepositActions from '../redux/actions/DepositActions'
import store from "../redux/store"
import axios  from "axios";

const StyledPaper = styled('div')
(({theme})=>({
  marginTop:'10%',
  marginLeft:'38%',
  width:350,//'fit-content',
  backgroundColor:'white',
  height:300,
  [theme.breakpoints.down('sm')]: {
    marginTop:'45%',
    marginLeft:0,
    height:350,
  },   
}))

const Formdiv = styled('div')
(({theme})=>({
  paddingTop:'10%',
  paddingLeft:'5%',
}))

const useStyles = makeStyles((theme) =>
  createStyles({
    inputs:{
        padding:15,
        width:250,
        marginLeft:9,
        marginTop:3,
        marginRight:9,
        marginBottom:9,
        border:'none',
        outline:'0.1px solid grey',
        borderRadius:10,
        "&:focus": {
        outline:'2px solid #ffd600',
        borderRadius:10,
        },
        [theme.breakpoints.down('sm')]: {
            outline:'0.5px solid grey' },
    },
    error:{
        color:'red',
        paddingLeft:15,
    }
  }),
);

const Alert = React.forwardRef(function Alert(props, ref) {
  return <MuiAlert elevation={6} ref={ref} variant="filled" {...props} />;
});

const Deposit = (props) => {
  const navigate = useNavigate()
  const {UserData} = props
  const state = store.getState()
  const {register, handleSubmit, formState:{errors}} = useForm()
  const classes = useStyles()
  const [userstate, setuserstate] = useState()
  const [Message, setMessage] = useState({})
  const [hamopen, setHamOpen] = useState(false);//snackbar
  const handleHamClose = ()=>{
    setHamOpen(false) 
  }
  const handle_Submit = ()=>{ 
    axios({
      method:'post',
      url:'/api/users/deposit',
      data:userstate,
      headers:{
        'Token':localStorage.getItem('verdant-x-token')
    }
  }).then(res=>{
      console.log(res)
      const message = res.data.message
      setMessage(message)
      setHamOpen(true)
      if(res.data.status!=200){
        const message = res.data.message
        setMessage(message)
        setHamOpen(true)
      }   
      else{ 
        const message = res.data.message
        setMessage(message)
        setHamOpen(true)
        setTimeout(() => {
          navigate('/dashboard')
        }, 3000);
      }
    }).catch((error)=>{
      console.log(error)
      const message = 'An error occured'
      setMessage(message)
      setHamOpen(true)
  })
  }
  
  return (
    <>
    <StyledPaper>
      <Formdiv>
          <Typography variant='h5' sx={{marginBottom:1, marginLeft:7, fontWeight:500}}>Deposit</Typography>
          <form onSubmit={handleSubmit((data)=>{
            handle_Submit()
          })
          }>
            <input {...register("Amount", {required:'Invalid!', minLength:{
                  value:1,
                  message:'Minimum 1 characters'
              }})}
              className={classes.inputs} type="number" placeholder='Amount'
              onChange={
                (e)=>{
                  const amount = e.target.value
                  setuserstate({...userstate,...{amount}})
                }}
              />
              <Typography variant='subtitle2' className={classes.error}> {errors.amount?.message}</Typography>
              
              <input {...register("phone", {required:'Invalid!', minLength:{
                  value:8,
                  message:'Minimum 8 characters'
              }})}
              className={classes.inputs} type="number" placeholder={'254' + state.userData.phone}
              onChange={
                (e)=>{
                  const phone = e.target.value
                  setuserstate({...userstate,...{phone}})
                }}
              />
              <Typography variant='subtitle2' className={classes.error}> {errors.phone?.message}</Typography>
              <LoginButton type='submit' value='Deposit'></LoginButton>
            </form>
      </Formdiv>
    </StyledPaper>
    <Stack spacing={2} sx={{ width: '100%' }}>
      <Snackbar open={hamopen} autoHideDuration={6000} onClose={handleHamClose}>
        <Alert onClose={handleHamClose} severity='info' sx={{ width: '100%',position:"relative", bottom:60 }}>
              {Message}
        </Alert>
      </Snackbar>
    </Stack>
    </>
  )
}


const mapStateToProps = (state)=>{
  return {
    datastate: state,
  }
}
const mapDispatchToProps = (dispatch)=>{
  return{
    UserData:(userdata)=>{
      dispatch(DepositActions(userdata))
    }
  }
}
export default connect(
  mapStateToProps,
  mapDispatchToProps
 ) (Deposit)
//export default Deposit
