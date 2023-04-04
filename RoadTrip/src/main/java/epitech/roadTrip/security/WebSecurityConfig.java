package epitech.roadTrip.security;


import org.springframework.context.annotation.Bean;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Configuration;
import org.springframework.security.authentication.AuthenticationManager;
import org.springframework.security.config.annotation.authentication.builders.AuthenticationManagerBuilder;
import org.springframework.security.config.annotation.method.configuration.EnableGlobalMethodSecurity;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.config.annotation.web.configuration.WebSecurityConfigurerAdapter;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.core.annotation.Order;
import org.springframework.security.web.authentication.UsernamePasswordAuthenticationFilter;

import epitech.roadTrip.security.services.UserDetailsServiceImpl;
import epitech.roadTrip.security.jwt.AuthTokenFilter;

@Configuration
@EnableWebSecurity
@EnableGlobalMethodSecurity(prePostEnabled = true)
@Order(1)
public class WebSecurityConfig extends WebSecurityConfigurerAdapter {
	@Autowired
	UserDetailsServiceImpl userDetailsService;
  
	@Bean
	public AuthTokenFilter authenticationJwtTokenFilter() {
	  return new AuthTokenFilter();
	}
  
	@Override
	public void configure(AuthenticationManagerBuilder authenticationManagerBuilder) throws Exception {
	  authenticationManagerBuilder.userDetailsService(userDetailsService).passwordEncoder(passwordEncoder());
	}
  
	@Bean
	@Override
	public AuthenticationManager authenticationManagerBean() throws Exception {
	  return super.authenticationManagerBean();
	}
  
	@Bean
	public PasswordEncoder passwordEncoder() {
	  return new BCryptPasswordEncoder();
	}
  
	@Override
	protected void configure(HttpSecurity http) throws Exception {
	  http.authorizeRequests().antMatchers("/api/login", "/api/register",
	  "/api/password/reset","/api/password/forgot", "/api/login/google", "/api/eat", "/api/drink","/api/sleep","/api/eat","/api/cities", "/api/eat/*", "/api/travel" ).permitAll()
		.anyRequest().authenticated().and().cors().and().csrf().disable();
  
	  http.addFilterBefore(authenticationJwtTokenFilter(), UsernamePasswordAuthenticationFilter.class);
	}
}