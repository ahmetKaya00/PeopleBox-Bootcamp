import React, { Component } from 'react'

export default class FormDemo1 extends Component {
    state = {userName:'', city:''}
    onChangeHandler=(event)=>{
        let name = event.target.name;
        let value = event.target.value;

        this.setState({[name]:value})
    }
    onSubmitHandler = (event)=>{
        event.preventDefault();
        alert(this.state.userName)
    }
    
    render() {
    return (
      <div>
        <form onSubmit={this.onSubmitHandler}>
            <h2>User Name</h2>
            <input name='userName' onChange={this.onChangeHandler} type='text'/>
            <h3>User Name is {this.state.userName}</h3>

            <h2>User Name</h2>
            <input name='city' onChange={this.onChangeHandler} type='text'/>
            <h3>City is {this.state.city}</h3>
            <input type='submit' value="Save"></input>
        </form>
      </div>
    )
  }
}
