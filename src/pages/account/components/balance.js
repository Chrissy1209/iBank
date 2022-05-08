import {Col,Card,Button} from 'react-bootstrap';
import { Link } from 'react-router-dom';
const Balance = () => {
    return (
        <Col xs={12} style={{margin:'-50px 0'}}>
            <Card  className="text-end">
                <Card.Header className="text-center" >9999</Card.Header>
                    <Card.Body>
                        <Card.Text className="text-start" style={{borderBottom: "1px solid darkgray"}}>
                            帳戶餘額
                            <Link to="/Transaction">
                            <Button variant="outline-secondary" style={{margin:'0 0 10px 170px'}}>
                                轉帳
                            </Button>
                            </Link>
                        </Card.Text>
                    </Card.Body>
            </Card>                       
        </Col>
    );
}

export default Balance