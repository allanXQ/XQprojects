// import './components/styles.css'
import {Route, Routes} from "react-router-dom"
import Deposit from './components/deposit';
// import Dep_history from './components/dep_history';

// import './components/styles.css'
import { BrowserRouter } from 'react-router-dom';



function App() {
  return (
    <BrowserRouter>
      <Routes>      
        <Route path="deposit" element={<Deposit/>}></Route>       
        {/* <Route path="*" element={<NotFound/>}></Route> */}


      </Routes>
      </BrowserRouter>
  );
}

export default App;
