FROM nginx:1.23.3-alpine

EXPOSE 80
RUN apk update && apk upgrade \
    && rm -r /var/cache/apk/*

RUN rm /etc/nginx/conf.d/default.conf
COPY nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf
