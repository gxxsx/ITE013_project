import { StatusBar } from 'expo-status-bar';
import React from 'react';
import { StyleSheet, Text, View, TextInput, TouchableOpacity } from 'react-native';


const Login = () =>  (
    <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center' }}>
      <View style={{justifyContent: 'center', alignItems: 'center', borderColor:'#000000', borderWidth: 3, width:400, height: 500 }}>
      <Text style={{fontSize: 60}}>LOGIN</Text>
      <Text></Text>
      <Text>Email:</Text>
      <TextInput  placeholder="email" />
      <Text>Password:</Text>
      <TextInput  placeholder="password" secureTextEntry={true} textAlign={'center'} />
      <TouchableOpacity >
        <Text>
          CONTINUE
        </Text>
      </TouchableOpacity>
      <TouchableOpacity>
        <Text>
          REGISTER
        </Text>
      </TouchableOpacity>
      </View>
    </View>
  );

export default Login