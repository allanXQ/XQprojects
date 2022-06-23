import { Button } from "@mui/material";
import { createTheme, ThemeProvider } from "@mui/material";

const theme = createTheme({
  palette: {
    primary: {
      // Purple and green play nicely together.
      main: '#ffd600',
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

  components: {
    // Name of the component
    MuiButton: {
      styleOverrides: {
        // Name of the slot
        root: {
          // Some CSS
          borderRadius:50,
          width:'17rem',
          padding:10,
          marginLeft:15,
          '&:hover':{
              backgroundColor:'#ffd600'
          }
        },
      },
    },
  },
});

const LoginButton = ({value, onClick, type}) => {
  return (
      <ThemeProvider theme={theme}>
        <Button type={type} variant="contained" onClick={onClick}>{value}</Button>
      </ThemeProvider>

  )
}

export default LoginButton