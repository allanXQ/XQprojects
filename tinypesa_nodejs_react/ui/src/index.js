import axios from 'axios';
import React from 'react';
import ReactDOM from 'react-dom';
import App from './App';
import { createTheme } from '@mui/material';
import { ThemeProvider } from '@mui/system';
import { BrowserRouter } from 'react-router-dom';
import { Provider } from 'react-redux';
import store,{persistor} from './redux/store'
// import { persistor } from './redux/store';
import { PersistGate } from 'redux-persist/integration/react';
// import Config from './webpack.config';

const theme = createTheme({
    palette: {
        primary: {
          main: '#ffffff',
          dark: '#212121'
        },
        secondary: {
          light:'#eeeeee',
          main: '#ffd600',
        },
        info:{
          main:'#4caf50'
        }
      },
    
  });

//axios.defaults.baseURL ='http://192.168.43.230:5000'  //'http://10.1.133.39:5000'//

ReactDOM.render(
  <React.StrictMode>
    <ThemeProvider theme={theme}>
    <Provider store={store}>
      <PersistGate persistor={persistor}>
      <App/>
      </PersistGate>
    </Provider>
    </ThemeProvider>,
  </React.StrictMode>,
  document.getElementById('root')
);


