import 'bootstrap/dist/css/bootstrap.min.css';
import './account.css';
import { Container,Row,Col ,Badge} from 'react-bootstrap';
import { useState } from "react";
import Member from './components/member';
import Balance from './components/balance';
import Transfer from './components/transfer';
import History from './components/history';
const app = {
    marginTop: "50px",
    marginBottom: "50px",
    height:'490px',
}
function ChangeColor(page){
    console.log(page);
    var account = document.getElementById("Account");
    var member = document.getElementById("Member");
    var history = document.getElementById("History");
    switch(page){
        case 'Account':
            account.style.backgroundColor="grey";
            member.style.backgroundColor="white";
            history.style.backgroundColor="white";
            break;
        case 'Member':
            account.style.backgroundColor="white";
            member.style.backgroundColor="grey";
            history.style.backgroundColor="white";
            break;
        case 'History':
            account.style.backgroundColor="white";
            member.style.backgroundColor="white";
            history.style.backgroundColor="grey";
            break;
    }
    // if(page == 'Account'){
    //     account.style.backgroundColor="grey";
    //     member.style.backgroundColor="white";
    //     history.style.backgroundColor="white";
    // }
    // else if(page == 'Member'){
    //     account.style.backgroundColor="white";
    //     member.style.backgroundColor="grey";
    //     history.style.backgroundColor="white";
    // }
    // else if(page == 'History'){
    //     account.style.backgroundColor="white";
    //     member.style.backgroundColor="white";
    //     history.style.backgroundColor="grey";
    // }

}
const Account = () => {
    const [page, setPage] = useState("AccountDetail");

    function ToAccountDetail() {
        setPage("AccountDetail");
        ChangeColor('Account');
    }
    function ToMemberProfile() {
        setPage("MemberProfile");
        ChangeColor('Member');
    }
    function ToHistoryProfile() {
        setPage("HistoryProfile");
        ChangeColor('History');
    }
    return(
        <Container className="d-flex justify-content-center align-item-top" style={app}>
            <Row >
                <Col xs={4}>
                    <p onClick={ToAccountDetail} className='myMember' id="Account" style={{backgroundColor:'grey'}}>我的帳戶</p>
                </Col>
                <Col xs={4}>
                    <p onClick={ToMemberProfile} className='myMember' id="Member">會員資料</p>
                </Col >
                <Col xs={4}>
                    <p onClick={ToHistoryProfile} className='myMember' id="History">歷史紀錄</p>
                </Col >
                    {page === "AccountDetail" && <Balance />}
                    {page === "AccountDetail" && <Transfer />}
                    {page === "MemberProfile" && <Member />}
                    {page === "HistoryProfile" && <History />}                            
            </Row>
            
        </Container>
    ); 
}
export default Account;