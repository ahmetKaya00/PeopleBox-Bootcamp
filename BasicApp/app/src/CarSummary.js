import React, { Component } from "react";
import { Link } from "react-router-dom";
import {
  UncontrolledDropdown,
  DropdownToggle,
  DropdownMenu,
  DropdownItem,
  Badge,
  NavItem,
  NavLink,
} from "reactstrap";

export default class CarSummary extends Component {
  renderSummary() {
    return (
      <UncontrolledDropdown nav inNavbar>
        <DropdownToggle nav caret>
          Sepet - {this.props.cart.length}
        </DropdownToggle>
        <DropdownMenu right>
          {this.props.cart.map((cartItem) => (
            <DropdownItem key={cartItem.product.id}>
            <Badge color="danger" onClick={()=>this.props.removeFromCart(cartItem.product)}>X</Badge>
              {cartItem.product.productName}
              <Badge color="primary">{cartItem.quantity}</Badge>
            </DropdownItem>
          ))}
          <DropdownItem divider />
          <DropdownItem>
            <Link to={"cart"}>Go To Cart</Link>
          </DropdownItem>
        </DropdownMenu>
      </UncontrolledDropdown>
    );
  }
  renderEmptyCart() {
    return (
      <NavItem>
        <NavLink>Sepet Boş</NavLink>
      </NavItem>
    );
  }

  render() {
    return (
      <div>
        {this.props.cart.length > 0
          ? this.renderSummary()
          : this.renderEmptyCart()}
      </div>
    );
  }
}
