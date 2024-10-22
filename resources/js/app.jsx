import "./bootstrap";
import React from "react";
import ReactDOM from "react-dom";
import ExampleComponent from "./components/ExampleComponent";

function App() {
    return (
        <div>
            <h1>Hello, React in Laravel!</h1>
            <ExampleComponent />
        </div>
    );
}

if (document.getElementById("app")) {
    ReactDOM.render(<App />, document.getElementById("app"));
}
