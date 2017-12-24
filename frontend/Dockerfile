FROM node:carbon

WORKDIR /usr/src/trello

#RUN npm install create-react-app -g

COPY package*.json ./

RUN npm install

COPY . .

EXPOSE 3000

CMD [ "npm", "start" ]