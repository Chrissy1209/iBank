import 'bootstrap/dist/css/bootstrap.min.css';
import { Container,Form,Row,Col,Button } from 'react-bootstrap';

const padding = {
    padding: "0 0 75px 0",
}

const formstyle = {
    display: 'flex',
    border: '1px solid #a7a5a5',
    borderRadius: '5px',
}

const labelstyle = {
    margin: '6px 10px ',
}

const inputstyle = {
    width: '70%',
    border: 'none',
}

const Transaction = () => {
    return(
        <Container className="d-flex justify-content-around w-100" style={{height:700}}>
            <Row style={padding} className='justify-content-center align-items-center'>
                <Col md={12}>
                    <Form>
                        <Form.Group style={formstyle} className="mb-3 " controlId="transactionEmail" >
                            <Form.Label style={labelstyle}>轉出帳號</Form.Label>
                            <small style={{padding: "8px 12px"}}>
                                1234567890
                            </small>
                            {/* <Form.Control style={inputstyle} type="text" readOnly>
                                1234567890
                            </Form.Control> */}
                        </Form.Group>
                        <Form.Group style={{textAlign:"end"}} className="mb-3" controlId="transactionText">
                            <Form.Text className="text-muted">
                            可用餘額 12345
                            </Form.Text>
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="transactionText">
                            <Form.Text className="text-muted">
                            ---------------------  轉給  ---------------------
                            </Form.Text>
                        </Form.Group>
                        <Form.Group style={formstyle} className="mb-3" controlId="transactionEmail" >
                            <Form.Label style={labelstyle}>轉入帳號</Form.Label>
                            <Form.Control style={inputstyle} type="email" placeholder="銀行代碼/帳號" />
                        </Form.Group>
                        <Form.Group style={formstyle} className="mb-3" controlId="transactionAmount">
                            <Form.Label style={labelstyle}>轉入金額</Form.Label>
                            <Form.Control  style={inputstyle} type="number" />
                        </Form.Group>
                        <Form.Group style={formstyle} className="mb-3" controlId="transactionRemark">
                            <Form.Label style={{margin:"6px 42px 6px 10px"}}>註記</Form.Label>
                            <Form.Control style={inputstyle} type="text" placeholder="顯示於交易明細限7字" />
                        </Form.Group>
                        {/* <Form.Group className="mb-3" controlId="transactionPassword">
                            <Form.Label>帳戶密碼</Form.Label>
                            <Form.Control type="password" placeholder="Password" />
                        </Form.Group>
                        <br></br>
                        <Form.Group className="mb-3" controlId="transactionCheckbox">
                            <Form.Check type="checkbox" label="Check me out" />
                        </Form.Group> */}
                        <Button style={{margin: "10px 10px 10px 0"}} variant="outline-secondary" type="submit">
                            立即轉帳
                        </Button>
                    </Form>
                </Col>
            </Row>
        </Container>
    ); 
}

export default Transaction