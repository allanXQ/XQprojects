import axios  from "axios";
import { 
    DEPOSIT_SUCCESS,
    DEPOSIT_FAIL } from "./types";

const userDataActions = (UserData)=>{
    return (dispatch)=>{
            console.log(UserData)
            const data = {
                phone:UserData.phone,
                amount:UserData.Amount
            }
            try {
                axios({
                    method:'post',
                    url:'/api/users/deposit',
                    data:data,
                    headers:{
                        'Token':localStorage.getItem('verdant-x-token')
                    }
                }).then(res=>{
                    console.log(res)
                    if(res.data.status!=200){
                        //localStorage.removeItem('verdant-x-token')
                        dispatch({type:DEPOSIT_FAIL, payload:{
                            message:'DEPOSIT:An error occurred. Try again'
                            }
                        })
                    }
                    else{
                        dispatch({type:DEPOSIT_SUCCESS, payload:{
                            message:res.data.message
                            }
                        })
                    }
                }) .catch((error)=>{
                    console.log(error)
                })
    } catch (error) {
        console.log(error)
            dispatch({type:DEPOSIT_FAIL, payload:{
                    message:'DEPOSIT:An error occurred. Try again'
            }
        })
        } 
    }
}

export default userDataActions