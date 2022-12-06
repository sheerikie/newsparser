FROM rabbitmq:3-management

# Enable rabbitmq_mqtt plugin
RUN rabbitmq-plugins enable rabbitmq_mqtt

# Set environment variables
ENV RABBITMQ_USER=khisaham
ENV RABBITMQ_PASSWORD=khisaham

# Copy init script and execute it to create the user above
COPY init.sh /init.sh
CMD ["./init.sh"]