import React from "react";
import Navi from "./Navi";
import CategoryList from "./CategoryList";
import ProductList from "./ProductList";
import { Col, Container, Row } from "reactstrap";

function App() {
  return (
    <div>
      <Container>
        <Row>
          <Navi />
        </Row>
        <Row>
          <Col xs="4">
            <CategoryList />
          </Col>
          <Col xs="8">
            <ProductList />
          </Col>
        </Row>
      </Container>
    </div>
  );
}

export default App;
