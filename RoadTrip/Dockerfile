FROM openjdk:17-oracle
VOLUME /tmp
EXPOSE 9000
ENV DB_HOSTNAME db
ENV DB_PORT 5432
ARG JAR_FILE=build/libs/*.jar
COPY ${JAR_FILE} app.jar
ENTRYPOINT ["java","-jar","/app.jar"]