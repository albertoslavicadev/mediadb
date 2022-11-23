import ReactDOM from "react-dom";


export default function Index() {
    return (
        <>
            <div><h1>Hello World</h1></div>
        </>
    )


}


if (document.getElementById('indextest')) {
    ReactDOM.render(<Index />, document.getElementById('indextest'));
}
