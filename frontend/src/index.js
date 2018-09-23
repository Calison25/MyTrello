import React from 'react';
import ReactDOM from 'react-dom';
import registerServiceWorker from './registerServiceWorker';
import Home from "./containers/Home";

ReactDOM.render(<Home />, document.getElementById('root'));
registerServiceWorker();
