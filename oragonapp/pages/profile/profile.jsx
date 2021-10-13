import { StatusBar } from 'expo-status-bar';
import React from 'react';
import { StyleSheet, Text, View, TextInput, TouchableOpacity } from 'react-native';

import Login from '../login/login';
import Register from '../register/register';

import { createStackNavigator } from '@react-navigation/stack';

const Stack = createStackNavigator();


const Profile = () =>  (
    <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center' }}>
           <Login/>

    
    
    </View>
  );



export default Profile