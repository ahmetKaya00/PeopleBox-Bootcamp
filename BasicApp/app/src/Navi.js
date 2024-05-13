import React from "react";
import {
  Collapse,
  Navbar,
  NavbarToggler,
  NavbarBrand,
  Nav,
  NavItem,
  NavLink,
} from "reactstrap";
import CarSummary from "./CarSummary";
import { Link } from "react-router-dom";
 
export default class Navi extends React.Component {
  render() {
    return (
      <div>
        <Navbar color="light" light expand="md">
          <NavbarBrand href="/">reactstrap</NavbarBrand>
          <NavbarToggler />
          <Collapse navbar>
            <Nav className="ms-auto" navbar>
              <NavItem>
                <NavLink>

                <Link to={"form1"}>Form 1</Link>
                </NavLink>
              </NavItem>
              <NavItem>
                <NavLink>

                <Link to={"form2"}>Form 2</Link>
                </NavLink>
              </NavItem>
              <NavItem>
                <NavLink href="https://github.com/reactstrap/reactstrap">
                  GitHub 
                </NavLink>
              </NavItem>
              <CarSummary removeFromCart={this.props.removeFromCart} cart={this.props.cart}/>
            </Nav>
          </Collapse>
        </Navbar>
      </div>
    );
  }
}