import 'bootstrap/dist/css/bootstrap.min.css';
import { Container,Row,Col } from 'react-bootstrap';
import Mycarousel from './components/carousel';
import Rate from "./components/rate";
import Background from "./image/wave.png";

const carousel = {
    padding:0,
}
const rate = {
    backgroundImage: `url(${Background})`,
    backgroundSize:'110%',
    backgroundPosition: "bottom",
    backgroundRepeat: "no-repeat",
    justifyContent: "center"
}
const text ={
    textAlign:'center',
    margin:'30px 0',
}
const Home = () => {
    return(
        <Container className="border " fluid>
            <Row className="border">
                <Col style={carousel} className=" justify-content-center align-items-center" xs={12}>
                    <Mycarousel/>   
                </Col>
            </Row>
            <Row style={rate} className="border">
                <h3 style={text}>即時匯率</h3>
                <Rate />
            </Row>
        </Container>  
    ); 
}
export default Home;