FROM debian:latest
EXPOSE 80
RUN apt-get update &&\
    apt-get install -y php7.4-mysql php7.4
COPY . /usr/src/demoscene
WORKDIR /usr/src/demoscene
CMD [ "php", "-S", "0.0.0.0:80", "./index.php" ]
