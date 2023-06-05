import './bootstrap';
import '../css/app.css';
import * as $ from 'jquery';

import ReactDOM from 'react-dom/client';        
import Home from './component/Home';

ReactDOM.createRoot(document.getElementById('root')).render(     
    <Home />
);
