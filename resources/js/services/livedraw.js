import axios from 'axios';

export const getLivedrawResult = async (page) => {
  try {
    const {data: results} = await axios.get(`/api/v1/livedraw`);

    return results;
  } catch (error) {
    throw error;
  }
};
