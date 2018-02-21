	if(checkMessage[0] == "~profile"){
		var profileNameRoot = message.content.split(" ");
		var profileName1 = profileNameRoot[1];
		var profileName = profileName1.replace("#", "-");
		message.channel.sendMessage("http://chukwumaokere.com/test/profile.php?bnet=" + profileName + "");
	}
