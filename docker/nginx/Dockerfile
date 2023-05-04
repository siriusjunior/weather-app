FROM nginx

ARG CONFNAME

# timezone
ENV TZ Asia/Tokyo
RUN echo "${TZ}" > /etc/timezone \
   && dpkg-reconfigure -f noninteractive tzdata

# nginx conf
ADD ./docker/nginx/$CONFNAME /etc/nginx/conf.d/default.conf
RUN sed -i 's|^worker_processes  1;[a-zA-Z0-9\.\-\"]*$|worker_processes  auto;|g' /etc/nginx/nginx.conf

RUN mkdir -p /app/public
ADD ./public/ /app/public/
